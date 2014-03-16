<?php

class Photo extends Eloquent {

		protected $table = 'images';
        
        protected $fillable = array('user_id', 'image_path', 'image_state');

        public function user()
        {
        	$this->belongsTo('User', 'user_id');
        }

}