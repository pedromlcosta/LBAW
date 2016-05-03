 
 <?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . 'database/course.php'); 

  $course = getCourseInfo($_GET['course']);

  $syllabusYears = getSyllabusYears($_GET['course']);
  $syllabusYears['nrYears'] = sizeof($syllabusYears);

  	/*	// FOR DEBUGGING
  $syllabus = getCourseUnits(2, 2015);

  // Determine nr. years to show
  if ($syllabus[0]['coursetype'] !== false){
      switch ($syllabus[0]['coursetype']) {
    
    case 'PhD':
        $syllabus['courseYears'] = 5;
        break;
    case 'Masters':
       $syllabus['courseYears'] = 5;
        break;
    case 'Bachelor':
        $syllabus['courseYears'] = 3;
        break;
    default:
      $syllabus['courseYears'] = 0;
      break;
      }
    }else{
      $syllabus['courseYears'] = 0;
    }

    $orderedSyllabus = array();
    $orderedSyllabus['courseYears'] = $syllabus['courseYears'];

    // Once to create as empty arrays
    for($i = 0; $i < sizeof($syllabus); $i++){
  		$orderedSyllabus[$syllabus[$i]['curricularyear']][$syllabus[$i]['curricularsemester']] = array();
    }

    // Another time to push into them, so as to encapsulate everything
    for($i = 0; $i < sizeof($syllabus); $i++){
    	array_push($orderedSyllabus[$syllabus[$i]['curricularyear']][$syllabus[$i]['curricularsemester']], $syllabus[$i]);
    }
	*/
    //var_dump(json_encode($syllabus[1]));
   	//var_dump(count($orderedSyllabus[1][1]));
	

  $smarty->assign('course', $course);
  $smarty->assign('syllabusYears', $syllabusYears);
  $smarty->display('course/coursePage.tpl');
?>
 