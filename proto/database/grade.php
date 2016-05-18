<?php
function createGrade($student,$evaluation,$grade){
	global $conn;
	$stmt = $conn->prepare("INSERT INTO Grade(studentcode, evaluationid, grade)
    VALUES (?, ?, ?)");

    $stmt->execute(array($student,$evaluation,$grade));
}

function updateGrade($student,$evaluation,$grade){

	global $conn;
	$stmt = $conn->prepare("UPDATE Grade SET grade=?
		WHERE studentcode = ? AND evaluationid = ?");
	
	$stmt->execute(array($attended,$evaluation,$grade));
}

function countEvaluationGrades($evaluation){

	global $conn;
	$stmt = $conn->prepare("SELECT COUNT(*) FROM Grade
		WHERE evaluationid = ? AND visible=1");

	$stmt->execute(array($evaluation));
	return $stmt->fetch();
}

function countStudentUCOGrades($student,$uco){

	global $conn;
	$stmt = $conn->prepare("SELECT COUNT(Grade.*)
		FROM Grade,Evaluation
		WHERE Grade.studentcode = ? AND Grade.evaluationid = Evaluation.cuoccurrenceid
		AND Evaluation.cuoccurrenceid = ? AND visible=1");

	$stmt->execute(array($student,$uco));
	return $stmt->fetch();
}

function getGrade($student,$evaluation){

	global $conn;
	$stmt = $conn->prepare("SELECT Person.name, Person.username, Grade.grade, Evaluation.evaluationdate, Curricularunit.name AS unit
		FROM Grade,Person,Evaluation,CurricularUnitOccurrence,CurricularUnit
		WHERE Grade.evaluationid = Evaluation.evaluationid AND Person.academiccode = Grade.studentcode AND
		Evaluation.cuoccurrenceid = CurricularUnitOccurrence.cuoccurrenceid AND
		CurricularUnitOccurrence.curricularunitid = CurricularUnit.curricularid AND
		Grade.studentCode = ? AND Evaluation.evaluationid = ? AND
		Grade.visible = 1");

	$stmt->execute(array($student,$evaluation));
	return $stmt->fetch();
}

function getGrades($nbEvaluations,$offset){

	global $conn;
	$stmt = $conn->prepare("SELECT Person.name, Person.username, Grade.grade, Evaluation.evaluationdate, Curricularunit.name AS unit
		FROM Grade,Person,Evaluation,CurricularUnitOccurrence,CurricularUnit
		WHERE Grade.evaluationid = Evaluation.evaluationid AND Person.academiccode = Grade.studentcode AND
		Evaluation.cuoccurrenceid = CurricularUnitOccurrence.cuoccurrenceid AND
		CurricularUnitOccurrence.curricularunitid = CurricularUnit.curricularid AND
		Grade.visible = 1 LIMIT ? OFFSET ?");

	$stmt->execute(array($nbEvaluations,$offset));
	return $stmt->fetchAll();
}

function getEvaluationGrades($evaluation,$nbEvaluations,$offset){

	global $conn;
	$stmt = $conn->prepare("SELECT Person.name, Person.username, Grade.grade, Evaluation.evaluationdate, Curricularunit.name AS unit
		FROM Grade,Person,Evaluation,CurricularUnitOccurrence,CurricularUnit
		WHERE Grade.evaluationid = Evaluation.evaluationid AND Person.academiccode = Grade.studentcode AND
		Evaluation.cuoccurrenceid = CurricularUnitOccurrence.cuoccurrenceid AND
		CurricularUnitOccurrence.curricularunitid = CurricularUnit.curricularid AND
		Evaluation.evaluationid = ? AND Grade.visible = 1 LIMIT ? OFFSET ?");

	$stmt->execute(array($evaluation,$nbEvaluations,$offset));
	return $stmt->fetchAll();
}

function getStudentUCOGrades($student,$uco,$nbAttendances,$offset){

	global $conn;
	$stmt = $conn->prepare("SELECT Person.name, Person.username, Grade.grade, Evaluation.evaluationdate, Curricularunit.name AS unit
		FROM Grade,Person,Evaluation,CurricularUnitOccurrence,CurricularUnit
		WHERE Grade.evaluationid = Evaluation.evaluationid AND Person.academiccode = Grade.studentcode AND
		Evaluation.cuoccurrenceid = CurricularUnitOccurrence.cuoccurrenceid AND
		CurricularUnitOccurrence.curricularunitid = CurricularUnit.curricularid AND
		Grade.studentCode = ? AND Evaluation.cuoccurrenceid = ? AND
		Grade.visible = 1");

	$stmt->execute(array($student,$uco,$nbAttendances,$offset));
	return $stmt->fetchAll();
}

function deleteGrade($studentCode,$evaluation){
 	global $conn;
    $stmt = $conn->prepare("UPDATE Grade SET visible=0
    	WHERE studentcode = ? AND evaluationid = ?");	
    $stmt->execute(array($studentCode,$evaluation));
}
?>