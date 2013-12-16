								<?php
									if($menuList!=null)
									{
										foreach($menuList as $menu)
										{
											if($menu['menu_link']==='this')
											{
								?>
								<tr class="odd gradeX">
									<td class="menu-parent"><?=$menu['menu_name']?></td>
									<td class="menu-parent">
										<input type="checkbox" name="checkbox" id="checkbox1" value="<?=$menu['menu_id']?>" class="changeGroupAccess" style="opacity: 0;" <?php if($menu['status']==='1') { ?>checked="checked" <?php } ?>>
									</td>
								</tr>
								<?php
											}
											else
											{
								?>
								<tr class="even gradeC">
									<td class="menu-child"><?=$menu['menu_name']?></td>
									<td class="menu-child">
										<input type="checkbox" name="checkbox" id="checkbox1" value="<?=$menu['menu_id']?>" class="changeGroupAccess" style="opacity: 0;" <?php if($menu['status']==='1') { ?>checked="checked" <?php } ?>>
									</td>
								</tr>
								<?php
											}
										}
									}
								?>