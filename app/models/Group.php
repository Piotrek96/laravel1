<?php

class Group extends \Eloquent {
	protected $fillable = [];
	

	public function user(){
		return $this->BelongsToMany('User','user_groups', 'group_id', 'user_id');
	}
}
