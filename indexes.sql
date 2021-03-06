﻿SET SCHEMA 'final'
;
 -- FULL TEXT INDEXES

CREATE INDEX tsv_person_idx ON Person USING gin(tsv);
CREATE INDEX tsv_course_idx ON Course USING gin(tsv);
CREATE INDEX tsv_curricularUnit_idx ON CurricularUnit USING gin(tsv);

-- INDEXES


CREATE INDEX username_idx ON Person USING hash(username);
CREATE INDEX request_student_idx ON Request USING hash(studentCode);
CREATE INDEX request_admin_idx ON Request USING hash(adminCode);


CREATE INDEX syllabus_course_idx ON Syllabus USING btree(courseCode);                -- Used in IN comparisons
CREATE INDEX cuEnroll_student_idx ON CurricularEnrollment USING btree(studentCode);  -- Used in IN comparisons
CREATE INDEX grade_eval_idx ON Grade USING btree(evaluationID);
CREATE INDEX occurrence_curricular_idx ON CurricularUnitOccurrence USING btree(curricularUnitID, cuOccurrenceID);
CREATE INDEX occurrence_syllabus_idx ON CurricularUnitOccurrence USING btree(syllabusID, cuOccurrenceID);
CREATE INDEX occurrence_evaluation_idx ON Evaluation USING btree(cuOccurrenceID,evaluationID);
CREATE INDEX evaluation_weight_idx ON Evaluation USING btree(weight);
CREATE INDEX grade_student_eval_idx ON Grade USING btree(studentCode, evaluationID);
CREATE INDEX grade_grade_idx ON Grade USING btree(grade);
CREATE INDEX group_elements_idx ON GroupWork USING btree(maxElements, minElements);
CREATE INDEX test_duration_idx ON Test USING btree(duration);
CREATE INDEX exam_duration_idx ON Exam USING btree(duration);


CREATE INDEX class_cuOccurrenceID_idx ON Class USING btree(occurrenceID);
ALTER TABLE Class CLUSTER ON class_cuOccurrenceID_idx;

CREATE INDEX courEnroll_currYear_idx ON CourseEnrollment USING btree(curricularYear);
ALTER TABLE CourseEnrollment CLUSTER ON courEnroll_currYear_idx;

CREATE INDEX cuEnroll_finalGra_idx ON CurricularEnrollment USING btree(finalGrade);
ALTER TABLE CurricularEnrollment CLUSTER ON cuEnroll_finalGra_idx;

CREATE INDEX cu_credits_idx ON CurricularUnit USING btree(credits);
ALTER TABLE CurricularUnit CLUSTER ON cu_credits_idx;



 