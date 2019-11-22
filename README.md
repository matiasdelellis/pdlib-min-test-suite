# pdlib-min-test-suite
This is a small set of tools to check the installation of requirements for the Nextcloud [Face Recognition](https://github.com/matiasdelellis/facerecognition) application.

### How to test pdlib?
Just clone the repository and run `make` or `make php-test` to ensure that [pdlib](https://github.com/goodspb/pdlib) work correctly.
```
[matias@nube ~]$ git clone https://github.com/matiasdelellis/pdlib-min-test-suite.git
Clonando en 'pdlib-min-test-suite'...
remote: Enumerating objects: 9, done.
remote: Counting objects: 100% (9/9), done.
remote: Compressing objects: 100% (9/9), done.
remote: Total 9 (delta 0), reused 9 (delta 0), pack-reused 0
Desempaquetando objetos: 100% (9/9), listo.
[matias@nube ~]$ cd pdlib-min-test-suite/
[matias@nube pdlib-min-test-suite]$ make 
php scripts/face_detect.php
Welcome to pdlib min test suite for Facerecognition app

First We try to open the models.
Done
Will be search faces on in the file: input/Big Bang Theory.jpg
Done. Found 7 faces
We get face landmarks of face 1
Done. Now get the face descriptor
Done.
We get face landmarks of face 2
Done. Now get the face descriptor
Done.
We get face landmarks of face 3
Done. Now get the face descriptor
Done.
We get face landmarks of face 4
Done. Now get the face descriptor
Done.
We get face landmarks of face 5
Done. Now get the face descriptor
Done.
We get face landmarks of face 6
Done. Now get the face descriptor
Done.
We get face landmarks of face 7
Done. Now get the face descriptor
Done.
Will be search faces on in the file: input/Big Bang Theory.png
Done. Found 7 faces
We get face landmarks of face 1
Done. Now get the face descriptor
Done.
We get face landmarks of face 2
Done. Now get the face descriptor
Done.
We get face landmarks of face 3
Done. Now get the face descriptor
Done.
We get face landmarks of face 4
Done. Now get the face descriptor
Done.
We get face landmarks of face 5
Done. Now get the face descriptor
Done.
We get face landmarks of face 6
Done. Now get the face descriptor
Done.
We get face landmarks of face 7
Done. Now get the face descriptor
Done.
```
If you did not return any errors, your installation of pdlib is correct. :smiley:

### How to test dlib
If any error occurs on lasrt test, you must first make sure that the installation of [dlib](https://github.com/davisking/dlib) work correctly.
```
[matias@nube pdlib-min-test-suite]$ make python-test 
python3 scripts/face_detect.py
Processing file: input/Big Bang Theory.jpg
Number of faces detected: 7
Face descriptor... Done
Face descriptor... Done
Face descriptor... Done
Face descriptor... Done
Face descriptor... Done
Face descriptor... Done
Face descriptor... Done
Processing file: input/Big Bang Theory.png
Number of faces detected: 7
Face descriptor... Done
Face descriptor... Done
Face descriptor... Done
Face descriptor... Done
Face descriptor... Done
Face descriptor... Done
Face descriptor... Done
```
If this also fails, you must reinstall dlib until it works properly before proceeding with pdlib and the Facerecognition application.
