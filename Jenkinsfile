pipeline {
    agent any
    stages {
        stage('Descargar Código') {
            steps {
                // Descarga el código actualizado de tu repositorio remoto
                git branch: 'main', url: 'https://github.com/alejandracarabali/catalogo-ap.git'
            }
        }
        stage('Validación de Sintaxis PHP') {
            steps {
                script {
                    // Revisa la sintaxis de todos los archivos .php en la carpeta
                    bat 'for /r %%f in (*.php) do C:\\xampp2\\php\\php.exe -l "%%f"'
                }
            }
        }
    }
}