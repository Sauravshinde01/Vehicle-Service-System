<?php
				$start = date('y-m-d H:i:s', strtotime('2021-06-05 10:00:0'));
				$end = date('y-m-d H:i:s', strtotime('2021-06-05 11:00:0'));
				$incrementDateBy = 1;
				date_default_timezone_set('Asia/Calcutta');
				$workHr = 1; //select max_time_to_service and set to $workHr
				$startTimeInterval = (60 * 60)*$workHr; 
				//select opening and closeing time 
				$open = strtotime($_GET['date'].' 10:00:0');
				$close = strtotime($_GET['date'].' 18:00:0');
				$tempOpen = $open;
				$tempClose = $close;
				$j = 0; //for increment in array
				//echo date('Y-m-d H:i:s', time()) . '<br/>';
				echo $_GET['date'].'</br>';
				?>
				<select name='slot' id="slot" >
					<option value="Select sloat">Select slot</option>
					<?php
					for ($increment = 1; $increment <= $incrementDateBy; $increment++) {
					?>
						<option disable value=<?php echo date('y-m-d H:i:s', $open);
												"style=color:red;" ?> style="color:red;"><?php echo date('y-m-d H:i:s', $open); ?></option>
						<?php
						for ($i = 0; $tempOpen < $tempClose; $i++) {
							if (!($start == date('y-m-d H:i:s', $tempOpen) && date('y-m-d H:i:s', $tempOpen + $startTimeInterval) == $end)) {
								$j++;
						?>
								<option value=<?php
												echo date('H:i:s', $tempOpen) . '-' . date('H:i:s', $tempOpen + $startTimeInterval);
												?>><?php
								echo date('H:i:s', $tempOpen) . '-' . date('H:i:s', $tempOpen + $startTimeInterval);
			?></option>
					<?php
							}

							$tempOpen = $tempOpen + $startTimeInterval;
						}

						$open = strtotime("+1 day", $open);
						$close = strtotime("+1 day", $close);
						$tempOpen = $open;
						$tempClose = $close;
					}
					echo $j;
					?>