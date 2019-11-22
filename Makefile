# Default rule

default: php-test

# Dependencies of the application

vendor/models/1/mmod_human_face_detector.dat:
	mkdir -p vendor/models/1
	wget https://github.com/davisking/dlib-models/raw/94cdb1e40b1c29c0bfcaf7355614bfe6da19460e/mmod_human_face_detector.dat.bz2 -O vendor/models/1/mmod_human_face_detector.dat.bz2
	bzip2 -d vendor/models/1/mmod_human_face_detector.dat.bz2

vendor/models/1/dlib_face_recognition_resnet_model_v1.dat:
	mkdir -p vendor/models/1
	wget https://github.com/davisking/dlib-models/raw/2a61575dd45d818271c085ff8cd747613a48f20d/dlib_face_recognition_resnet_model_v1.dat.bz2 -O vendor/models/1/dlib_face_recognition_resnet_model_v1.dat.bz2
	bzip2 -d vendor/models/1/dlib_face_recognition_resnet_model_v1.dat.bz2

vendor/models/1/shape_predictor_5_face_landmarks.dat:
	mkdir -p vendor/models/1
	wget https://github.com/davisking/dlib-models/raw/4af9b776281dd7d6e2e30d4a2d40458b1e254e40/shape_predictor_5_face_landmarks.dat.bz2 -O vendor/models/1/shape_predictor_5_face_landmarks.dat.bz2
	bzip2 -d vendor/models/1/shape_predictor_5_face_landmarks.dat.bz2

download-models: vendor/models/1/mmod_human_face_detector.dat vendor/models/1/dlib_face_recognition_resnet_model_v1.dat vendor/models/1/shape_predictor_5_face_landmarks.dat

# Tests

php-test: download-models
	php scripts/face_detect.php

python-test: download-models
	python3 scripts/face_detect.py

tests: php-test

# Clean

clean:
	rm -f vendor/models/1/*
