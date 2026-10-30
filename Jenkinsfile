pipeline{
    agent any
    environment{
        IMAGE_NAME = "nousheenr/new-project"
        CONTAINER_NAME = 'my-php-container'
    }
    stages{
        stage("checkout"){
            steps{
                git branch: 'main',
                    url:'https://github.com/noushinraza7/php-practice.git'
            }
        }
        stage("build"){
            steps{
                sh'''
                    docker build -t ${IMAGE_NAME}:${BUILD_NUMBER} .
                '''
            }
        }
        stage("push"){
            steps{
                withCredentials([usernamePassword(
                    credentialsId: 'dockerhub',
                    usernameVariable: 'DOCKERHUB_USER',
                    passwordVariable: 'DOCKERHUB_PASSWORD'
                )]){

                sh'''
                    echo "$DOCKERHUB_PASSWORD" | docker login \
                        -u "$DOCKERHUB_USER" --password-stdin
                    
                    docker push ${IMAGE_NAME}:${BUILD_NUMBER}

                    docker logout
                '''
                }
            }
        }

        stage("deploy"){
            steps{
                sh'''
                    docker rm -f ${CONTAINER_NAME} || true

                    docker run -d --name ${CONTAINER_NAME}\
                        -p 8081:80 ${IMAGE_NAME}:${BUILD_NUMBER}

                    docker ps 
                '''
            }
        }
    }
}