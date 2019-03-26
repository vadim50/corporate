<?php 
namespace Corp\Repositories;
use Config;

abstract class Repository{

	protected $model = false;

	public function get($select = '*', $take = false, $pagination = false, $where = false){
		$builder = $this->model->select($select);

		if($take){
			$builder->take($take);
		}
		if($where){
			$builder->where($where[0], $where[1]);
		}

		if($pagination){
			return $this->check($builder->paginate(Config::get('settings.paginate')));
		}
		//dd($builder->get());
		return $this->check($builder->get());
	}

	protected function check($result){
		if($result->isEmpty()){
			return false;
		}

		$result->transform(function($item, $key){

			//dd($item);

			if(is_string($item->img) && is_object(json_decode($item->img))
				&& (json_last_error() == JSON_ERROR_NONE)){
				$item->img = json_decode($item->img);
			}
			

			return $item;
		});

		return $result;
	}

	public function one($alias, $attr = []){
		$result = $this->model->where('alias', $alias)->first();

		return $result;
	}


	public function transliterale($string){

		$str = mb_strtolower($string, 'UTF-8');

		$letter_array  = [

			"a"=>"а",
			"b"=>"б",
			"v"=>"в",
			"g"=>"г",
			"d"=>"д",
			"e"=>"е",
			"yo"=>"ё",
			"j"=>"ж",
			"z"=>"з",
			"i"=>"и",
			"ii"=>"ы",
			"io"=>"й",
			"k"=>"к",
			 "l"=>"л",
			 "m"=>"м",
			 "n"=>"н",
			 "o"=>"о",
			 "p"=>"п",
			 "r"=>"р",
			 "s"=>"с",
			 "t"=>"т",
			 "y"=>"у",
			 "f"=>"ф",
			 "h"=>"х",
			 "c"=>"ц",
			 "ch"=>"ч",
			 "sh"=>"ш",
			 "sh"=>"щ",
			 "e"=>"е",
			 "u"=>"у",
			 "ya"=>"я"
		];

		foreach($letter_array as $letter => $cyr){
			
			//$cyr = explode(',', $cyr);
			
			//$letter = explode(',', $letter);
			          
			$str = str_replace($cyr, $letter, $str);
		}

		$str = preg_replace("/(\s|[^A-Za-z0-9\-])+/", '-', $str);

		$str = trim($str, '-');
		//dd($str);
		return $str;
	}
}

 ?>