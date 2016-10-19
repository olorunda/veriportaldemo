<?php

namespace App\Repositories\Interfaces;

interface PanelInterface {

	public function store(array $data);

	public function single_user($email);

	public function user_exists($email);

	public function update($password, $photo);

	public function destroy($email);

	public function undo_destroy($email);

	public function perm_destroy($email);
}