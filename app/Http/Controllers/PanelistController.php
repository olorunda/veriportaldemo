<?php

namespace App\Http\Controllers;

use App\Panelist;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Mail;

use App\Mail\NotifyPanelist;

use App\Repositories\Interfaces\PanelInterface;

use App\User;

use App\PanelMember;

use App\documents;

use App\Skills;

use Auth;

use Validator;

class PanelistController extends Controller
{
    //
	protected $panelist;

	public function __construct(PanelInterface $panelist) {
		$this->middleware('auth');
		$this->panelist = $panelist;
	}

	public function index() {
		$skills = $this->panelist->skills();
		$rated = $this->panelist->rated();
		$rateTable = $this->panelist->rateTable('others');
		$applicants = $this->panelist->applicants();
		$applicantsTotal = $this->panelist->applicantsTotal();
		return view('panel.ratetable', ['applicants'=>$applicants, 'rated'=>$rated, 'applicantsTotal'=>$applicantsTotal, 'rateTable'=>$rateTable, 'skills'=>$skills]);
	}

	public function rateTable() {
		$rated = $this->panelist->rated();
		$rateTable = $this->panelist->rateTable('stage2');
		$applicants = $this->panelist->applicants();
		$applicantsTotal = $this->panelist->applicantsTotal();
		return view('panel.index', ['applicants'=>$applicants, 'rated'=>$rated, 'applicantsTotal'=>$applicantsTotal, 'rateTable'=>$rateTable]);
	}

	public function panelist() {
		$panelmembers = $this->panelist->panelmembers();
		$skills = $this->panelist->skills();
		return view('panel.panelist', ['panelmembers'=>$panelmembers, 'skills'=>$skills]);
	}

	public function comments() {
		$refnum = $request->refnum;
		$applicant = $this->panelist->singleApplicant($refnum);
		return view('panel.comments', ['applicant'=>$applicant]);
	}

	public function getrate(Request $request) {
		$refnum = $request->refnum;
		$user = Auth::user()->name;
		$getrate = $this->panelist->getRate($refnum,$user);
		return response()->json($getrate);
	}

	public function store(Request $request) {
		$retVal;
		$this->validate($request, [
			'first_name' => 'required|string',
			'last_name' => 'required|string', 
			'photo' => 'required|mimes:jpeg,bmp,png,jpeg',
			'email' => 'required|string',
			'password' => 'required|alpha_num|confirmed',

			]);

		if($this->panelist->user_exists($request->email)) {
			$retVal = $this->panelist->user_exist($request->email);
		} else {
			$photoname = strtoupper($request->first_name) . time() . '.' . $request->file('file')->getClientOriginalExtenstion();
			$request->file('file')->move('upload/photos', $photoname);

			$password = $this->keygen();
			$create = $this->panelist->store([
				'f_name' => $request->first_name,
				'l_name' => $request->last_name,
				'email' => $request->email,
				'photo' => $photoname,
				'password' => $password
				]);
		}
	}

	public function keygen($len=8) {
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$count = mb_strlen($chars);
		for($i = 0, $result = ''; $i < $len; $i++) {
			$index = rand(0, $count - 1);
			$result .= mb_substr($chars, $index, 1);
		}
		return $result;
	}

	public function editmember(Request $request) {
		if($request->ajax()) {
			$name = $request->name;
			$email = $request->email;

			return response()->json($this->panelist->editmember($name,$email));
		}
	}

	public function deletemember(Request $request) {
		if($request->ajax()) {
			$name = $request->name;
			$email = $request->email;

			return response()->json($this->panelist->deletemember($name,$email));			
		}
	}

	public function checkmail(Request $request) {
		$isMail = false;
		if($request->ajax()) {
			$name = $request->name;
			$email = $request->email;

			return response()->json($this->panelist->checkmail($email));
		}
	}

	public function send(Request $request) {
		$status = "sent";
		if($request->ajax()) {
			$name = $request->name;
			$email = $request->email;
			$password = $this->keygen();
			try {
				Mail::to($email)->send(new NotifyPanelist($name, $email, $password));
				if(count(Mail::failures()) > 0) {
					foreach(Mail::failures as $mail) {
						$status = $mail;
					}
				}
				//after sending mail, save to database
				$save_member = $this->panelist->save_member([
					'name' => $name,
					'email' => $email,
					'password' => $password,
					'photo' => '1471958985.png',
					'role' => 1
				]);
			} catch (\Exception $ex) {
				$status = $ex;
			}
			return response()->json($status);
		}
	}

	public function rate(Request $request) {
		$logic = false; $logic2 = false;
		$rate = false;
		if($request->ajax()) {
			/*$this->validate($request, [
				'uname' => 'required|string',
				'ref_num' => 'required',
				'rating' => 'required'
				]);*/
				$uname = $request->name;
				$ref_num = $request->ref_num;
				$rating = $request->rating;

				$logic = $this->panelist->rate($uname,$ref_num,$rating);
				$logic2 = $this->panelist->updateUser($ref_num,$rating);
				if($logic==true && $logic2==true){
					$rate = !$rate;
				}
				return response()->json($rate);
			}
		}

		public function rate1(Request $request) {
			if($request->ajax()) {
				$total = $request->total;
				$refnum = $request->ref_num;
				$user = $request->user;
				$comments = $request->comments;
				$index = $total - 5;
				$data = array();
				$i=0;
				$sum = 0;

			//the following two for loops can be optimized back to just one for loop
			/**
			 * this calulation splits the object sent from the user into 
			 * two and then pick the first half which represents the category the panel
			 * member is rating
			 */
			for($i=1;$i<=($index/2);$i++) {
				$name = "skillname" . $i;
				$data[$name] = $request->$name;
			}

			/**
			 * this calulation splits the object sent from the user into 
			 * two and then pick the second half which represents the value for
			 * the panel member is currently rating.
			 * Also, sum the total ratings to update the user rating column.
			 */

			for($i=1;$i<=($index/2);$i++) {
				$value = "skillvalue".$i;
				$data[$value] = $request->$value;
				$sum += $request->$value;
			}
			$data['user'] = $user;
			$data['comments'] = $comments;

			$logic = $this->panelist->rate1($data,$refnum,$total);
			$logic2 = $this->panelist->updateUser($refnum,$sum);
			$logic3 = $this->panelist->comment(Auth::user()->id,$refnum,$comments);

			$rate1 = false;
			if($logic && $logic2 && $logic3) {
				$rate1 = !$rate1;
			}
			return response()->json($rate1);
		}
	}

	public function checkrate(Request $request) {
		$hasRated = false;
		if($request->ajax()) {
			$refnum = $request->refnum;
			$user = $request->user;

			$hasRated = $this->panelist->hasRated($refnum,$user);
			return response()->json($hasRated);
		}
	}

	public function getdocuments(Request $request) {
		if($request->ajax()) {
			$id = $request->viewref;
			return $this->panelist->getdocuments($id);
		}
	}

	public function checkskill(Request $request) {
		if($request->ajax()) {
			$skill = $request->skill;
			$grade = $request->grade;
			$logic = $this->panelist->checkSkill($skill);
			return response()->json($logic);
		}
	}

	public function addskill(Request $request) {
		if($request->ajax()) {
			$skill = $request->skill;
			$grade = $request->grade;
			$logic = $this->panelist->addSkill($skill,$grade);
			return response()->json($logic);
		}
	}

	public function editskill(Request $request) {
		if($request->ajax()) {
			$skill = $request->skill;
			$grade = $request->grade;
			$oldskill = $request->oldskill;

			return response()->json($this->panelist->editskill($oldskill,$skill,$grade));
		}
	}

	public function deleteskill(Request $request) {
		if($request->ajax()) {
			$skill = $request->skill;
			$grade = $request->grade;

			return response()->json($this->panelist->deleteskill($skill,$grade));
		}
	}
}
