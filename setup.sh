cd /home/amit/projects/returnkaro
ssh -i returnkaro.pem bitnami@52.74.197.248

cd /home/amit/projects/returnkaro
ssh -N -L 8888:127.0.0.1:80 -i returnkaro.pem bitnami@52.74.197.248
