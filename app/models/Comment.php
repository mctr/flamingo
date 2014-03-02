<?php

class Comment extends Eloquent {

		protected $table = 'comments';
        
        protected $fillable = array('comment', 'user_id', 'who_did_id');

        public function user()
        {
        	$this->belongsTo('User', 'user_id');
        }

}