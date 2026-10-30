pipeline{
    agent any
    environment{
        IMAGE_NAME = "nousheenr/new-project"
    }
    stages{
        stage("checkout"){
            steps{
                git branch: 'bt'
                url: 'https://github.com/noushinraza7/testing.git'
            }
        }
    }
}