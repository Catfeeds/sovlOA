<div class="main_xl_detail_box03">
    <div class="main_xl_detail_box03_main">
    	<div class="main_xl_detail_box03_main_left">
		<?php	$kkmodel="";
				if(isset($_GET['kid'])&&$_GET['kid']){
					$kkmodel=Kkinfo::model()->findByPk($_GET['kid']);
				}
				if($kkmodel){?>
        	<div class="nav-zb" id="height01">
        		<b>您现在查看的是：</b><?=$model->s_name."->".$kkmodel->zyclass."->".$kkmodel->zyname."(".$kkmodel->ktitle.")"?>
        	</div>	
            <div style=" margin:0 40px;">
			<?php
				echo nl2br($kkmodel->zycon)."</div>";
			}else{
				echo "您查找的专业不存在";
			}
			?>
      </div>
    	<?=$this->renderPartial("_schoolright",array("model"=>$model));?>
    </div>
</div>