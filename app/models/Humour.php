<?php

class Humour extends Eloquent {

		protected $table = 'humours';

        protected $fillable = array('user_id', 'image_path', 'humour_content');

        public function user()
        {
        	$this->belongsTo('User', 'user_id');
        }

}