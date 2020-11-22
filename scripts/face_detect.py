#!/usr/bin/python
# The contents of this file are in the public domain. See LICENSE_FOR_EXAMPLE_PROGRAMS.txt

import sys
import os
import glob
try:
    import dlib
except ImportError:
    print("it seems you don't have python binding installed")
    exit()

detector_path = "vendor/models/1/mmod_human_face_detector.dat"
predictor_path = "vendor/models/1/shape_predictor_5_face_landmarks.dat"
face_rec_model_path = "vendor/models/1/dlib_face_recognition_resnet_model_v1.dat"
faces_folder_path = "input/"

# Load all the models we need: a detector to find the faces, a shape predictor
# to find face landmarks so we can precisely localize the face, and finally the
# face recognition model.

print ("Welcome to pdlib min test suite for Facerecognition app");
print ("")
print ("First we try to open the models... ", end='');

detector = dlib.cnn_face_detection_model_v1(detector_path)
sp = dlib.shape_predictor(predictor_path)
facerec = dlib.face_recognition_model_v1(face_rec_model_path)

print ("Done")
print ("")

# Now find all the faces and compute 128D face descriptors for each face.
types = (os.path.join(faces_folder_path, "*.jpg"), os.path.join(faces_folder_path, "*.png"))
files_grabbed = []
for files in types:
    files_grabbed.extend(glob.glob(files))

for f in files_grabbed:
    print("Processing file: {}".format(f))
    img = dlib.load_rgb_image(f)

    # Ask the detector to find the bounding boxes of each face. The 1 in the
    # second argument indicates that we should upsample the image 1 time. This
    # will make everything bigger and allow us to detect more faces.
    dets = detector(img)
    print("Number of faces detected: {}".format(len(dets)))

    # Now process each face we found.
    for k, d in enumerate(dets):
        # Get the landmarks/parts for the face in box d.
        print ("Face landmarks... ", end = '')
        rec = dlib.rectangle(d.rect.left(), d.rect.top(), d.rect.right(), d.rect.bottom())
        shape = sp(img, rec)
        print ("Done")

        # Compute the 128D vector that describes the face in img identified by
        # shape.  
        print ("Face descriptor... ", end='')
        face_descriptor = facerec.compute_face_descriptor(img, shape)
        print ("Done")


