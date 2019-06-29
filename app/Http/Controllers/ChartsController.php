<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use App\User;
use Moyasar\Payment;
use Moyasar\Client;
class ChartsController extends Controller
{
	public function chartindex()
	{
	    include('simple_html_dom.php');
		$url = 'https://info.finance.yahoo.co.jp/ranking/?kd=7&mk=1&tm=d&vl=a';
		$html = file_get_html($url);
		$unitids = array();
		if(!empty($html)){
			foreach($html->find("a") as $element) {
				if(!empty($element->href)){
					$pos = strrpos($element->href,"s://stocks.finance.yahoo.co.jp/stocks/detail/?code=");
					if($pos == 4){
						array_push($unitids, substr($element->href, 55, 4));
					}
				}
			}
		}
		$html = file_get_contents('https://tradingeconomics.com/japan/stock-market');
		$array = array();
		if(!empty($html)){
			$real_html = str_replace('<td style="text-align: center;">', "xxxxx", $html);
			$rankings = strtok($real_html, "xxxxx");
			$i = 0;
			while ($rankings !== false)
			{
				$rankings = strtok("xxxxx");
				$pos = strripos($rankings,"%");
				if($pos){
					if($pos < 8){
						$ranking = substr($rankings, 0, $pos);
						$array[$i]["ranking"] = $ranking;
						$i++;
					}
				}
			}
			$i = 0;
			$ids = strtok($real_html, '<b>');
			while ($ids !== false)
			{
				$ids = strtok('<b>');
				if(strlen($ids) === 4){
					preg_match('/[0-9]+/', $ids, $numberid);
						if(!empty($numberid)){
							if(strlen($numberid[0]) === 4){
								$array[$i]["chartid"] = $numberid[0];
								$i++;
							}
						}
				}
			}
		}
		foreach($unitids as $unitrow){
		    $i++;
		    $array[$i]["ranking"] = rand(0,5); $array[$i]["chartid"] = $unitrow;
		}
		$sorted_lists = self::sort_ranking_lists($array, "ranking");
		$chartids = array();
		$i = 0;
		$total_count = 0;
		foreach ($sorted_lists as $row) {
			if ($row["ranking"] >= 0){
				$total_count++;
				if ($i < 30) {
					array_push($chartids, $row["chartid"]);
					$i++;
				}
			}
		}
		$pagination = ceil($total_count / 30);
		$cur_move = 75;
		return view('charts')->with("chartids",$chartids)->with("pagination", $pagination)->with("cur_page",1)->with("cur_move", $cur_move)->with("total_count", $total_count);
	}
	public function pagination($id, $cur_move, $total_count){
	    include('simple_html_dom.php');
		$url = 'https://info.finance.yahoo.co.jp/ranking/?kd=7&mk=1&tm=d&vl=a';
		$html = file_get_html($url);
		$unitids = array();
		if(!empty($html)){
			foreach($html->find("a") as $element) {
				if(!empty($element->href)){
					$pos = strrpos($element->href,"s://stocks.finance.yahoo.co.jp/stocks/detail/?code=");
					if($pos == 4){
						array_push($unitids, substr($element->href, 55, 4));
					}
				}
			}
		}
		$html = file_get_contents('https://tradingeconomics.com/japan/stock-market');
		$array = array();
		if(!empty($html)){
			$real_html = str_replace('<td style="text-align: center;">', "xxxxx", $html);
			$rankings = strtok($real_html, "xxxxx");
			$i = 0;
			while ($rankings !== false)
			{
				$rankings = strtok("xxxxx");
				$pos = strripos($rankings,"%");
				if($pos){
					if($pos < 8){
						$ranking = substr($rankings, 0, $pos);
						$array[$i]["ranking"] = $ranking;
						$i++;
					}
				}
			}
			$i = 0;
			$ids = strtok($real_html, '<b>');
			while ($ids !== false)
			{
				$ids = strtok('<b>');
				if(strlen($ids) === 4){
					preg_match('/[0-9]+/', $ids, $numberid);
						if(!empty($numberid)){
							if(strlen($numberid[0]) === 4){
								$array[$i]["chartid"] = $numberid[0];
								$i++;
							}
						}
				}
			}
		}
		foreach($unitids as $unitrow){
		    $i++;
		    $array[$i]["ranking"] = rand(0,5); $array[$i]["chartid"] = $unitrow;
		}
		$sorted_lists = self::sort_ranking_lists($array, "ranking");
		$chartids = array();
		$i = 0;
		foreach ($sorted_lists as $row) {
			if ($row["ranking"] >= 0){
				if ($total_count <= ($id * 30)) {
					if ($i > (($id-1) * 30) && $i <= $total_count) {
						array_push($chartids, $row["chartid"]);
					}
				}
				else if ($i > (($id-1) * 30) && $i <= ($id * 30)) {
					array_push($chartids, $row["chartid"]);
				}
				$i++;
			}
		}
		$pagination = ceil($total_count / 30);
		return view('charts')->with("chartids",$chartids)->with("pagination", $pagination)->with("cur_page",$id)->with("cur_move", $cur_move)->with("total_count", $total_count);
	}
	
	public function sort_ranking_lists($a, $subkey){
	    foreach($a as $k=>$v){
	        $b[$k] = strtolower($v[$subkey]);
	    }
	    arsort($b);
	    foreach($b as $key=>$val){
	        $c[] = $a[$key];
	    }
	    return $c;
	}
	public function postPayment(Request $request)
	{
		$input = $request->all();
		$callback_url = url("/");
		$user_name = "DavidSiyan";
		$amount = 300;
		$description = "creditcard";
		Client::setApiKey("sk_test_MrtwozLJAuFmLKWWSaRaoaLX");
		$card = [
		    "type" => $request->get('card_type'),//credit card type
		    "name" => $user_name,
		    "number" => $request->get('card_no'),
		    "cvc" => $request->get('card_cvc'),
		    "month" => $request->get('ccExpiryMonth'),
		    "year" => $request->get('ccExpiryYear')
		];
		try {
			$response = Payment::create($request->get('amount'), $card, $description, "SAR", $callback_url);
			if($payment['status'] == 'succeeded') {
				/**
				* Write Here Your Database insert logic.
				*/
				return redirect()->route('/', ['parameter' => $response]);
			} else {
				Session::put('error','Money not add in wallet!!');
				return redirect()->route('/', ['error' => 'Money not add in wallet!!']);
			}
		} catch (Exception $e) {
			Session::put('error',$e->getMessage());
			return redirect()->route('/', ['error' => $e->getMessage()]);
		}
	}
}