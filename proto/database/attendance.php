<?php
function createAttendance($student,$class,$attend){
	global $conn;
	$stmt = $conn->prepare("INSERT INTO Attendance(studentcode,classid,attended)
    VALUES (?, ?, ?)");

    $stmt->execute(array($student,$class,$attend));
}

function updateAttendance($student,$class,$attended){

	global $conn;
	$stmt = $conn->prepare("UPDATE Attendance SET attended=?
		WHERE studentcode = ? AND classid = ?");
	
	$stmt->execute(array($attended,$student,$class));
}

function countClassAttendances($class){

	global $conn;
	$stmt = $conn->prepare("SELECT COUNT(*) FROM Attendance
		WHERE classid = ? AND visible=1");

	$stmt->execute(array($class));
	return $stmt->fetch();
}

function countStudentUCOAttendances($student,$uco){

	global $conn;
	$stmt = $conn->prepare("SELECT COUNT(Attendance.*)
		FROM Attendance, Class
		WHERE Attendance.studentcode = ? AND Attendance.classid = Class.classid
		AND Class.occurrenceid = ? AND visible=1");

	$stmt->execute(array($student,$uco));
	return $stmt->fetch();
}

function getAttendance($student,$class){

	global $conn;
	$stmt = $conn->prepare("SELECT Person.name, Person.username, Attendance.attended, Class.classdate, Curricularunit.name AS unit
		FROM Attendance,Person,Class, CurricularUnitOccurrence,CurricularUnit
		WHERE Attendance.classid = Class.classid AND Person.academiccode = Attendance.studentcode AND
		Class.occurrenceid = CurricularUnitOccurrence.cuoccurrenceid AND
		CurricularUnitOccurrence.curricularunitid = CurricularUnit.curricularid AND
		Attendance.studentCode = ? AND Attendance.classid = ? AND
		Attendance.visible = 1");

	$stmt->execute(array($student,$class));
	return $stmt->fetch();
}

function getClassesAttendances($student,,$nbAttendances,$offset){

	global $conn;
	$stmt = $conn->prepare("SELECT Person.name, Person.username, Attendance.attended, Class.classdate, Curricularunit.name AS unit
		FROM Attendance,Person,Class, CurricularUnitOccurrence,CurricularUnit
		WHERE Attendance.classid = Class.classid AND Person.academiccode = Attendance.studentcode AND
		Class.occurrenceid = CurricularUnitOccurrence.cuoccurrenceid AND
		CurricularUnitOccurrence.curricularunitid = CurricularUnit.curricularid AND
		Attendance.classid = ? AND Attendance.visible = 1 LIMIT ? OFFSET ?");

	$stmt->execute(array($student,$nbAttendances,$offset));
	return $stmt->fetchAll();
}

function getStudentUCOAttendances($student,$uco,$nbAttendances,$offset){

	global $conn;
	$stmt = $conn->prepare("SELECT Person.name, Person.username, Attendance.attended, Class.classdate, Curricularunit.name AS unit
		FROM Attendance,Person,Class, CurricularUnitOccurrence,CurricularUnit
		WHERE Attendance.classid = Class.classid AND Person.academiccode = Attendance.studentcode AND
		Class.occurrenceid = CurricularUnitOccurrence.cuoccurrenceid AND
		CurricularUnitOccurrence.curricularunitid = CurricularUnit.curricularid AND
		Attendance.studentcode = ? AND Class.occurrenceid = ? AND Attendance.visible = 1 LIMIT ? OFFSET ?");

	$stmt->execute(array($student,$uco,$nbAttendances,$offset));
	return $stmt->fetchAll();
}

function deleteAttendance($studentCode,$class){
 	global $conn;
    $stmt = $conn->prepare("UPDATE Attendance SET visible=0
    	WHERE studentcode = ? AND classid = ?");	
    $stmt->execute(array($studentCode,$class));
}
?>