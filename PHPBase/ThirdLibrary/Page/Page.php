<?php
/**
 * Pagination class
 * @author dotcoo zhao <dotcoo@163.com>
 * @link https://www.dotcoo.com/page
 */
class Page {
	public $total;						// 记录总条数
	public $page;						// 当前第几页
	public $pagesize;					// 每页大小
	public $last;						// 总共页数

	public $nodata_text = "暂无数据!";	// 暂无数据!
	public $first_text = "首页";		// 首页
	public $last_text = "尾页";			// 尾页
	public $prev_text = "上一页";		// 上一页
	public $next_text = "下一页";		// 下一页

	public $half = 4;					// 平均显示数量
	public $static = false;				// 是否静态页面
	public $pIndex = 0;					// 静态分页索引
	public $format = "";				// 静态格式化
	public $params = array();			// 静态参数

	/**
	 * Page分页组件
	 * @param number $total
	 * @param number $pagesize
	 * @param number $page
	*/
	function __construct($total, $page=1, $pagesize=15) {
		$this->total = $total;
		// $this->page = isset($_GET["p"]) && is_numeric($_GET["p"]) ? intval($_GET["p"]) : $page;
		$this->page = $page;
		$this->pagesize = $pagesize;
	}

	/**
	 * 静态分页
	 * @param number $pIndex
	 * @param string $format
	 * @param number $param1
	 * @return string
	 */
	public function setStatic($pIndex, $format) {
		$this->static = true;
		$this->pIndex = $pIndex;
		$this->format = $format;
		$params = func_get_args();
		array_shift($params);
		array_shift($params);
		$this->params = $params;
	}

	/**
	 * 超链接
	 * @param number $p
	 * @return string
	 */
	public function href($p) {
		if ($this->static) {
			$this->params[$this->pIndex-1] = $p;
			return vsprintf($this->format, $this->params);
		} else {
			$urls = parse_url($_SERVER["REQUEST_URI"]);
			$params = array();
			parse_str(isset($urls["query"])?$urls["query"]:"", $params);
			$params["p"] = $p;
			return $urls["path"]."?".http_build_query($params);
		}
	}

	/**
	 * 显示分页代码
	 * @return string
	 */
	public function show($params = array()) {
		if (empty($this->total)) {
			return '<div class="pagebar">'.$this->nodata_text.'</div>';
		}

		$this->last = intval(($this->total+$this->pagesize-1)/$this->pagesize);
		$this->page = $this->page < 1 || $this->page > $this->last ? 1 : $this->page;
		$start = $this->page - $this->half;
		$end = $this->page + $this->half;
		$length = $this->half * 2;
		
		if ($start < 1) {
			$start = 1;
			$end = $start+$length < $this->last ? $start+$length : $this->last;
		}
		if ($end > $this->last) {
			$end = $this->last;
			$start = $end-$length > 1 ? $end-$length : 1;
		}

		$html = '<div class="pagebar">';
		
		// 上一页
		if ($this->page == 1) {
			$html .= empty($this->first_text)?'':'<span>'.$this->first_text.'</span>';
			$html .= '<span>'.$this->prev_text.'</span>';
		} else {
			$html .= empty($this->first_text)?'':'<a href="'.$this->href(1).'">'.$this->first_text.'</a>';
			$html .= '<a href="'.$this->href($this->page-1).'">'.$this->prev_text.'</a>';
		}
		
		// 页数
		for ($i=$start; $i<=$end; $i++) {
			if ($this->page == $i) {
				$html .= '<span>'.$i.'</span>';
			} else {
				$html .= '<a href="'.$this->href($i).'">'.$i.'</a>';
			} 
		}
		
		// 下一页
		if ($this->page == $this->last) {
			$html .= '<span>'.$this->next_text.'</span>';
			$html .= empty($this->last_text)?'':'<span>'.$this->last_text.'</span>';
		} else {
			$html .= '<a href="'.$this->href($this->page+1).'">'.$this->next_text.'</a>';
			$html .= empty($this->last_text)?'':'<a href="'.$this->href($this->last).'">'.$this->last_text.'</a>';
		}
		
		$html .= '</div>';
		return $html;
	}
	
	public function getStyle() {
		return <<<STYLE
.pagebar {text-align:center;}
.pagebar span, .pagebar a {border:1px #DDD solid;margin:1px;display:inline-block;padding:4px;}
.pagebar a {color:black;text-decoration:none;}
.pagebar span {color:#999;}
STYLE;
	}
}
