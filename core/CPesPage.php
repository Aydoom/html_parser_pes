<?php
/**
 * Класс для манипулирования объектом созданным при распарсивании страницы
 */

namespace Pes\Core;

class CPesPage extends CPesDoc{



	/**
	 * Возвращает html - код
	 * @param type $separat
	 * @return type string
	 */
	public function html($separat = ""){
		
		$output = "";
		
		$output = $this->getDom()->getHtmlArray();
		
		if (count($output) > 0) {
			
			$output = implode($separat, $output);
		
		}
		
		return CPesComment::add($output);	
	}
	
	
	
	/**
	 * Возвращает содержимое (контент) 
	 * @return type string
	 */
	function text(){
		return CPesHandler::getText($this->getDom());
	}
	
	/**
	 * Удаляем элементы массива
	 * @param type $id - массив с элементами которые должны быть удалены формата:
	 * array(
	 *	array(
	 *		'start'=>i,'end'=>y
	 *	)
	 * )
	 */
	function delete($id){
		$dom = $this->getDom();
		if(isset($id[0])){
			foreach($id as $val){
				for($i=$val['start'];$i<=$val['end'];$i++){
					unset($dom[$i]);
				}
			}
			$this->setDom(CPesHandler::patters($dom));
		}
	}
	function __toString(){
	}


	
}