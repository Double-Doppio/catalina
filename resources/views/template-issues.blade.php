{{--
  Template Name: Issues Template
--}}

@extends('layouts.app')

@section('content')

    <?php
      
      $pageTitle = get_field("title");
      $pageSubtitle = get_field("sub_title");
      
    ?>
  
    <div class="section-container rev">

      <div class="text-section box-red">
        <h1 class="text-top">ISSUES</h1>
        <h1 class="text-title meet-title"><?php echo $pageTitle; ?></h1>
        <h1 class="text-mid"><?php echo $pageSubtitle; ?></h1>
        <h1 class="text-bot"><i class="fa fa-angle-down"></i></h1>
      </div>

      <div class="image-section">
        <img src="@asset('images/CC_-140.jpg')"/>
      </div>
    
    </div>

  <?php 
    $order = get_field('order');

    $args = array(
      'post__in' => $order,
      'orderby'=>'post__in',
      'post_type'=>'issue',
      'numberposts'=>-1
    );

    $orderIssues = get_posts($args); 

    $counter = 0;
    
    foreach($orderIssues as $issue){
  
    $counter++;

    $colorArray = array('red','blue','green');

    $color = $colorArray[($counter%3)];

    $issueID = $issue->ID;  
    if( $counter%2 == 1 ) { ?>

    <div class="section-container">

    <div class="image-section">
        <img src="<?php echo get_the_post_thumbnail_url($issueID); ?>"/>
      </div>

    <div class="text-section box-<?php echo $color; ?>">
        <h1 class="text-top"><?php echo $counter; ?></h1>
        <h1 class="text-title title-issue"><?php echo get_the_title($issueID);?></h1>
        <h1 class="text-mid"><?php echo get_field('issue_subtitle', $issueID); ?></h1>
        <a class="learn-more" href="<?php echo get_permalink($issueID); ?>"><i class="fa fa-arrow-right"></i>&nbsp;<p>Learn More</p></a>
      </div>

    </div>
    
  <?php } else { ?>

  <div class="section-container rev">

    <div class="text-section box-<?php echo $color; ?>">
      <h1 class="text-top"><?php echo $counter; ?></h1>
      <h1 class="text-title title-issue"><?php echo get_the_title($issueID);?></h1>
      <h1 class="text-mid"><?php echo get_field('issue_subtitle', $issueID); ?></h1>
      <a class="learn-more" href="<?php echo get_permalink($issueID); ?>"><i class="fa fa-arrow-right"></i>&nbsp;<p>Learn More</p></a>
    </div>

    <div class="image-section">
      <img src="<?php echo get_the_post_thumbnail_url($issueID); ?>"/>
    </div>
  </div>

  <?php } ?>

  <?php } ?>
  
  
@endsection
