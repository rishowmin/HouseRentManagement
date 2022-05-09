<div class="pagination-div">
<ul class="pagination">
                                                    <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
                                                        <a <?php if($page_no > 1){ echo "href='?page=$previous_page&search=$search_values'"; } ?> data-toggle="tooltip" data-placement="Left" data-original-title="Previous">
                                                            <i class="fa fa-chevron-left"></i>
                                                        </a>
                                                    </li>
                                                    
                                                    <?php 
                                                    if ($total_no_of_pages <= 10){  	 
                                                        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                                                            if ($counter == $page_no) {
                                                        echo "<li class='active'><a>$counter</a></li>";	
                                                                }else{
                                                        echo "<li><a href='?page=$counter&search=$search_values'>$counter</a></li>";
                                                                }
                                                        }
                                                    }
                                                    elseif($total_no_of_pages > 10){
                                                        
                                                    if($page_no <= 4) {			
                                                    for ($counter = 1; $counter < 8; $counter++){		 
                                                            if ($counter == $page_no) {
                                                        echo "<li class='active'><a>$counter</a></li>";	
                                                                }else{
                                                        echo "<li><a href='?page=$counter&search=$search_values'>$counter</a></li>";
                                                                }
                                                        }
                                                        echo "<li><a>...</a></li>";
                                                        echo "<li><a href='?page=$second_last&search=$search_values'>$second_last</a></li>";
                                                        echo "<li><a href='?page=$total_no_of_pages&search=$search_values'>$total_no_of_pages</a></li>";
                                                        }

                                                    elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
                                                        echo "<li><a href='?page=1&search=$search_values'>1</a></li>";
                                                        echo "<li><a href='?page=2&search=$search_values'>2</a></li>";
                                                        echo "<li><a>...</a></li>";
                                                        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
                                                        if ($counter == $page_no) {
                                                        echo "<li class='active'><a>$counter</a></li>";	
                                                                }else{
                                                        echo "<li><a href='?page=$counter&search=$search_values'>$counter</a></li>";
                                                                }                  
                                                    }
                                                    echo "<li><a>...</a></li>";
                                                    echo "<li><a href='?page=$second_last&search=$search_values'>$second_last</a></li>";
                                                    echo "<li><a href='?page=$total_no_of_pages&search=$search_values'>$total_no_of_pages</a></li>";      
                                                            }
                                                        
                                                        else {
                                                        echo "<li><a href='?page=1&search=$search_values'>1</a></li>";
                                                        echo "<li><a href='?page=2&search=$search_values'>2</a></li>";
                                                        echo "<li><a>...</a></li>";

                                                        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                                                        if ($counter == $page_no) {
                                                        echo "<li class='active'><a>$counter</a></li>";	
                                                                }else{
                                                        echo "<li><a href='?page=$counter&search=$search_values'>$counter</a></li>";
                                                                }                   
                                                                }
                                                            }
                                                    }
                                                ?>
                                                    
                                                    <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
                                                        <a <?php if($page_no < $total_no_of_pages) { echo "href='?page=$next_page&search=$search_values'"; } ?> data-toggle="tooltip" data-placement="Right" data-original-title="Next">
                                                            <i class="fa fa-chevron-right"></i>
                                                        </a>
                                                    </li>
                                                    <!-- <?php if($page_no < $total_no_of_pages){
                                                        echo "<li><a href='?page=$total_no_of_pages&search=$search_values'><i class='fa fa-angle-double-right'></i></a></li>";
                                                        } ?> -->
                                                </ul>
                                                <div style="padding-top: 5px;">
                                                    <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong> <br>
                                                </div>
                                            </div>