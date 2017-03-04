<script type="text/javascript"src="/js/seach.js"></script>
<div class="top_box02">
	  <div class="top_box02_logo"><a href="/"><img src="/admin_root/<?php echo $web["z_logo"];?>" /></a></div>
	  <div class="top_box02_search">
	    <div class="top_search">
	      <div class="top_search_box01" id="tb_">
	        <ul>
	          <li id="tb_1" class="hovertab" onclick="HoverLi(1);">
	            <h1><a href="javascript:void(null);">学校</a></h1>
              </li>
	          <li id="tb_2" class="normaltab" onclick="HoverLi(2);">
	            <h1><a href="javascript:void(null);">开设课程</a></h1>
              </li>
            </ul>
          </div>
	      <div class="top_search_box02">
	        <div class="dis" id="tbc_01">
            <form name="sscform" method="post" action="/index_search_s.php">
	          <dl>              
	            <dt><!--onKeyUp="(this.value);"onblur="cont1();-->
<input type="text" id="inputer" name="school_key" Oninput="userXMLHttp(this.value)" Onpropertychange="userXMLHttp(this.value)" onkeydown="if(event.keyCode==32) return false" />
                </dt>
                <dd><img src="/images/search_anniu.jpg" onclick="document.sscform.submit()"/></dd>
              </dl>
            </form>
              
            </div>
	       <div class="undis" id="tbc_02">
	          <dl>
              <form name="skcform" method="post" action="/index_search_k.php">
                <dt>
	              <input type="text" name="Course_key" onfocus="userXMLHttp(this.value)" onkeydown="if(event.keyCode==32) return false"/>
                </dt>
	            <dd><img src="/images/search_anniu.jpg" onclick="document.skcform.submit()"/></dd>
              </form>
              </dl>
            </div>  
          </div>
        </div>
	  <div class="top_box02_search_box02"> <a href="javascript:void(null);">高级搜索</a><br />
	      <a href="javascript:void(null);">使用帮助</a> </div>
      </div>
    </div>
	<div class="top_box03">
        <div class="top_nav">
	<div class="top_nav_box01">
    	<?=$this->renderPartial('/layouts/_nav_menu')?>
    </div>
    <div class="top_nav_box02">
    	<div class="top_nav_box02_box01"><img src="/images/nav_line01.jpg"></div>
        <?=$this->renderPartial('/layouts/_nav_list')?>
        <div class="top_nav_box02_box03"><img src="/images/nav_line02.jpg"></div>
    </div>
</div>    </div>