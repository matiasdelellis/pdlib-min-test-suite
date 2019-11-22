<?php
print ("Welcome to pdlib min test suite for Facerecognition app\n\n");

print ("First We try to open the models.\n");

$cfd = new CnnFaceDetection("vendor/models/1/mmod_human_face_detector.dat");

$fld = new FaceLandmarkDetection("vendor/models/1/shape_predictor_5_face_landmarks.dat");

$fr = new FaceRecognition("vendor/models/1/dlib_face_recognition_resnet_model_v1.dat");

print ("Done\n");

// Find faces.
function findFaces ($img_path)
{
    // Reuse models
    global $cfd, $fld, $fr;

    print ("Will be search faces on in the file: ".$img_path."\n");
    $facesFound = $cfd->detect($img_path);
    print ("Done. Found ".count($facesFound)." faces\n");

    $faceId = 0;
    foreach ($facesFound as $faceFound)
    {
        $faceId++;
        print ("We get face landmarks of face ".$faceId."\n");
        $full_landmarks = $fld->detect($img_path, $faceFound);
        print ("Done. Now get the face descriptor\n");
        $descriptorAligned = $fr->computeDescriptor($img_path, $full_landmarks);
        print ("Done.\n");
    }

}

$fileList = glob('input/*');
foreach($fileList as $filename) {
    findFaces ($filename);
}