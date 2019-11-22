<?php
print ("Welcome to pdlib min test suite for Facerecognition app\n\n");

print ("First we try to open the models... ");

$cfd = new CnnFaceDetection("vendor/models/1/mmod_human_face_detector.dat");

$fld = new FaceLandmarkDetection("vendor/models/1/shape_predictor_5_face_landmarks.dat");

$fr = new FaceRecognition("vendor/models/1/dlib_face_recognition_resnet_model_v1.dat");

print ("Done\n\n");

// Find faces.
function findFaces ($img_path)
{
    // Reuse models
    global $cfd, $fld, $fr;

    print ("Processing file: ".$img_path."\n");
    $facesFound = $cfd->detect($img_path);
    print ("Number of faces detected: ".count($facesFound)."\n");

    foreach ($facesFound as $faceFound)
    {
        print ("Face landmarks... ");
        $full_landmarks = $fld->detect($img_path, $faceFound);
        print ("Done\n");

        print ("Face descriptor... ");
        $descriptorAligned = $fr->computeDescriptor($img_path, $full_landmarks);
        print ("Done\n");
    }

}

$fileList = glob('input/*');
foreach($fileList as $filename) {
    findFaces ($filename);
}