<?php

class User_groups extends \Eloquent {
protected $table = 'user_groups';

public function artist()
{
	return $this->belongsTo('group')
}
public function groups(){
	return $this->belonsToMany('users')
}


}