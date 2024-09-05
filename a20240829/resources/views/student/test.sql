INSERT INTO `students` (`id`, `name`, `created_at`, `updated_at`) 
VALUES (NULL, '老王1', NULL, NULL), (NULL, '老王2', NULL, NULL), (NULL, '老王3', NULL, NULL);

SELECT
    students.id,
    students.name,
    students.mobile,
    phones.phone

FROM
    students
    INNER JOIN phones ON students.id = phones.student_id;