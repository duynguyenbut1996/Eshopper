<?php
	require_once './db/dbHelper.php';
?>
<div class="col-sm-2" style="margin-left:100px">
					<div class="left-sidebar">
						<h2>Loại sản Phẩm</h2>
						<!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
                                	<?php
            
									 $sql = "select * from loaisanpham";
									$rs = load($sql);
						
									while ($row = $rs->fetch_assoc()) {
										$id = $row["MaLoaiSanPham"];
										$name = $row["TenLoaiSanPham"];
										?>
										<a class="list-group-item" href="index.php?act=products&id=<?php echo $id; ?>"><?php echo $name; ?></a>
										<?php
									}
									?>
								</div>
							
							
							
						</div><!--/category-products-->
                        <h2>Hãng sản xuất</h2>
                        <div class="panel panel-default">
						<div class="panel-heading" ><!--manufacturer_products-->
							<div class="brands-name">
								<?php
            
									 $sql = "select * from hangsanxuat";
									$rs = load($sql);
						
									while ($row = $rs->fetch_assoc()) {
										$id = $row["MaHangSanXuat"];
										$name = $row["TenHangSanXuat"];
										?>
										<a class="list-group-item" href="index.php?act=manufacturer&id=<?php echo $id; ?>"><?php echo $name; ?></a>
										<?php
									}
									?>
                                    
                               </div>     
							</div>
						</div><!--/manufacturer_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
				
						
					</div>
				</div>
             