1. Cretate Laravel Project
`composer create-project --prefer-dist laravel/laravel abet "7.*"`
2. Link to DB in .env and install pakage `composer require doctrine/dbal`


3. create migrate file from BD (option)
https://github.com/kitloong/laravel-migrations-generator

4. create model class from DB
a. install the package: https://github.com/krlove/eloquent-model-generator

b. Run commands
`
php artisan krlove:generate:model Assessment --table-name=assessment
php artisan krlove:generate:model AssessmentTool --table-name=assessment_tool
php artisan krlove:generate:model ClassAssessment --table-name=class_assessment
php artisan krlove:generate:model ClassAssessmentCourse --table-name=class_assessment_course
php artisan krlove:generate:model ClassSession --table-name=class_session
php artisan krlove:generate:model ClassSloClo --table-name=class_slo_clo
php artisan krlove:generate:model CloSlo --table-name=clo_slo
php artisan krlove:generate:model Course --table-name=course
php artisan krlove:generate:model CourseAssessment --table-name=course_assessment
php artisan krlove:generate:model CourseLevel --table-name=course_level
php artisan krlove:generate:model CourseProgram --table-name=course_program
php artisan krlove:generate:model Discipline --table-name=discipline
php artisan krlove:generate:model Instructor --table-name=instructor
php artisan krlove:generate:model LearingOutcome --table-name=learing_outcome
php artisan krlove:generate:model Program --table-name=program
php artisan krlove:generate:model Result --table-name=result
php artisan krlove:generate:model Slo --table-name=slo
php artisan krlove:generate:model Student --table-name=student
php artisan krlove:generate:model AsiinAssessmentTool --table-name=asiin_assessment_tool
php artisan krlove:generate:model AsiinClo --table-name=asiin_clo
php artisan krlove:generate:model AsiinCloSlo --table-name=asiin_closlo
php artisan krlove:generate:model CourseAssessmentAsiin --table-name=course_assessment_asiin
`


5. Intall the IU package:
`composer require laravel/ui:^2.4`
`php artisan ui bootstrap --auth`

`npm install`
then
`npm run dev`
or
`npm run watch`
