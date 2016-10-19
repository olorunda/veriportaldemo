<?php

namespace App\Repositories;

use Auth;

use App\Panelist;

use App\Repositories\Interfaces\PanelInterface;

use App\User;

use App\Rating;

use App\documents;

use App\PanelMember;

use App\Skills;

use App\Comment;

use Illuminate\Support\Facades\DB;

class PanelRepository implements PanelInterface {

	public function store(array $data) {
		$created = false;
		try {
			$logic = Panelist::create([
				'f_name' => $data['f_name'],
				'l_name' => $data['l_name'],
				'email' => $data['email'],
				'password' => $data['password']
				]);
			if($logic) {
				$created = !$created;
			}
		} catch(\Exception $ex) {
			$created = $ex;
		}
		return $created;
	}

	public function single_user($email) {
		$user = null;
		try {
			$user = Panelist::find($email);
		} catch(\Exception $ex) {
			$user = $ex;
		}
		return $user;
	}

	public function user_exists($email) {
		$exists = null;
		try {
			if(Panelist::where('email', $email)->exists()) {
				$exists = !$exists;
			}
		} catch(\Exception $ex) {
			$exists = $ex;
		}
	}

	public function update($password, $photo) {

	}

	public function destroy($email) {
		$deleted = false;
		try {
			$logic = Panelist::where('email', $email)->delete();
			if($logic) {
				$deleted = !$deleted;
			}
		} catch(\Exception $ex) {
			$deleted = $ex;
		}
		return $deleted;
	}

	public function undo_destroy($email) {
		$undo = false;
		try {
			$logic = Panelist::where('email', $email)->restore();
			if($logic) {
				$undo = !$undo;
			}
		} catch(\Exception $ex) {
			$undo = $ex;
		}
		return $undo;
	}

	public function perm_destroy($email) {
		$norecord = false;
		try {
			$logic = Panelist::where('email', $email)->forceDelete();
			if($logic) {
				$norecord = !$norecord;
			}
		} catch(\Exception $ex) {
			$norecord = $ex;
		}
		return $norecord;
	}

	public function editmember($name,$email) {
		$edited = false;
		try {
			$logic = PanelMember::where('email',$email)->update(['name'=>$name,'email'=>$email]);
			$edited = !$edited;
		} catch(\Exception $ex) {
			$edited = $ex;
		}
		return $edited;
	}

	public function deletemember($name,$email) {
		$deleted = false;
		try {
			$logic = PanelMember::where('email',$email)->where('name',$name)->delete();
			$deleted = !$deleted;
		} catch(\Exception $ex) {
			$deleted = $ex;
		}
		return $deleted;
	}

	public function checkmail($mail) {
		$isMail = false;
		try {
			$logic = PanelMember::where('email',$mail)->first();
			if($logic) {
				$isMail = !$isMail;
			}
		} catch(\Exception $ex) {
			$isMail = $ex;
		}
		return $isMail;
	}

	public function save_member(array $data) {
		$created = false;
		try {
			$logic = PanelMember::create([
				'name' => $data['name'],
				'email' => $data['email'],
				'password' => bcrypt($data['password']),
				'photo' => $data['photo'], 
				'role' => $data['role']
				]);
			if($logic) {
				$created = !$created;
			}
		} catch(\Exception $ex) {
			$created = $ex;
		}
		return $created;
	}

	public function panelmembers() {
		$panelmembers = null;
		try {
			$panelmembers = Panelist::all();
		} catch(\Exception $ex) {
			$panelmembers = $ex;
		}
		return $panelmembers;
	}

	public function skills() {
		$skills = null;
		try {
			$skills = Skills::all();
		} catch(\Exception $ex) {
			$skills = $ex;
		}
		return $skills;
	}

	public function applicants() {
		$applicants = null;
		try {
			//$applicants = DB::table('users')->where('type',0)->where('rated',0)->get();
			$applicants = User::where('type',0)->paginate(5);
		} catch(\Exception $ex) {
			$applicants = $ex;
		}
		return $applicants;
	}

	public function singleApplicant($refnum) {
		$applicant = null;
		try {
			$applicant = User::where('ref_num',$refnum)->get();
		} catch(\Exception $ex) {
			$applicant = $ex;
		}
		return $applicant;
	}

	public function applicantsTotal() {
		$total = null;
		try {
			$total = User::where('type',0)->count();
		} catch(\Exception $ex) {

		}
		return $total;
	}

	public function rateTable($page) {
		$rateTable = null;
		try {
			if($page=="stage2") {
				$rateTable = DB::table('rating')->where('name', \Auth::user()->name)->where('type', $page)->select('ref_num')->get();
			} else{
				$rateTable = DB::table('rating')->where('name', \Auth::user()->name)->whereNotIn('type', ["stage2"])->select('ref_num')->get();
			}
			//$rateTable = Rating::where('name',Auth::user()->name)->get();
		} catch(\Exception $ex) {
			$rateTable = $ex;
		}
		return $rateTable;
	}

	public function rated() {
		$total = null;
		try {
			//$total = User::where('type',0)->where('rated')->count();
			$total = DB::table('users')->where('rated', '>', 0)->where('type', 0)->count();
		} catch(\Exception $ex) {
			$total = $ex;
		}
		return $total;
	}

	public function rate($uname,$ref_num,$rating) {
		$rated = false;
		try {
			$logic = Rating::create([
				'name' => $uname,
				'ref_num' => $ref_num,
				'rating' => $rating,
				'type' => 'stage2'
				]);
			if($logic) {
				$rated = !$rated;
			}
		} catch(\Exception $ex) {
			$rated = $ex;
		}
		return $rated;
	}

	public function rate1(array $data, $refnum, $total) {
		$rated = false;
		$index = $total - 1;
		try {
			for($i=1;$i<($index/2); $i++) {
				$name = "skillname".$i;
				$value = "skillvalue".$i;
				$logic = Rating::create([
					'name'=>$data['user'],
					'ref_num'=>$refnum,
					'type'=>$data[$name],
					'rating'=>$data[$value]
				]);
				$rated = !$rated;
			}
		} catch(\Exception $ex) {
			$rated = $ex;
		}
		return $rated;
	}

	public function updateUser($ref_num,$rating) {
		$updateUser = false;
		try {
			$old = DB::table('users')->select('rated')->where('ref_num', '=', $ref_num)->first();
			$oldrate = $old->rated;
			$newrate = $rating + $oldrate;
			$logic = User::where('ref_num',$ref_num)->update(['rated'=>$newrate]);
			if($logic) {
				$updateUser = !$updateUser;
			}
		} catch(\Exception $ex) {
			$old = $ex;
		}
		return $updateUser;
	}

	public function comment($user_id,$refnum,$comment) {
		$saveComment = false;
		try {
			$logic = Comment::create([
				'mem_id' => $user_id,
				'ref_num' => $refnum,
				'comment' => $comment
			]);
			$saveComment = !$saveComment;
		} catch(\Exception $ex) {
			$saveComment = $ex;
		}
		return $saveComment;
	}

	public function getRate($refnum,$user) {
		$getRate = null;
		try {
			$getRate = Rating::where('name',$user)->where('ref_num',$refnum)->get();
		} catch(\Exception $ex) {
			$getRate = $ex;
		}
		return $getRate;
	}

	public function hasRated($refnum,$user) {
		$rating = null;
		$logic = null;
		try {
			//$logic = DB::table('rating')->select('rating')->where('ref_num', '=', $refnum)->where('name', '=', $user)->first();
			$logic = Rating::where('ref_num', $refnum)->where('name', $user)->where('type', 'stage2')->first();
			$rating = $logic->rating;
		} catch(\Exception $ex) {
			$rating = $ex;
		}
		return $rating;
	}

	public function getdocuments($id) {
		$documents = array();
		try {
			$documents = DB::table('documents')->select('document')->where('user_ref','=',$id)->get();
			//$documents = documents::where('user_ref',$id)->get();
		} catch(\Exception $ex) {
			$documents = $ex;
		}
		return $documents;
	}

	public function checkSkill($skill) {
		$isSkill = false;
		try {
			if(Skills::where('skill', '=', $skill)->exists()) {
				$isSkill = !$isSkill;
			}
		} catch(\Exception $ex) {
			$isSkill = $ex;
		}
		return $isSkill;
	}

	public function addSkill($skill,$grade) {
		$added = false;
		try {
			$logic = Skills::create([
				'skill' => $skill,
				'grade' => $grade
				]);
			if($logic) {
				$added = !$added;
			}
		} catch(\Exception $ex) {
			$added = $ex;
		}
		return $added;
	}

	public function editskill($oldskill,$skill,$grade) {
		$edited = false;
		try {
			$logic = Skills::where('skill',$oldskill)->update(['skill'=>$skill,'grade'=>$grade]);
			if($logic) {
				$edited = !$edited;
			}
		} catch(\Exception $ex) {
			$edited = $ex;
		}
		return $edited;
	}

	public function deleteskill($skill,$grade) {
		$deleted = false;
		try {
			$logic = Skills::where('skill',$skill)->delete();
			$deleted = !$deleted;
		} catch(\Exception $ex) {
			$deleted = $ex;
		}
		return $deleted;
	}
}