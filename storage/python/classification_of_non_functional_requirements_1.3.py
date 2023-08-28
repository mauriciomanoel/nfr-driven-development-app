#importing libraries
import nltk
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.tree import DecisionTreeClassifier
from sklearn.metrics import accuracy_score
from sklearn.model_selection import train_test_split
import sys

#Função para leitura de arquivos
def loadFiles(file_path):
    # Abrir o arquivo CSV e ler os dados
    with open(file_path, 'r') as file:
        return file.read()

#Função para leitura de arquivos e retorna um array
def loadFilesToArray(file_path):
    data = []
    # Abrir o arquivo CSV e ler os dados
    with open(file_path, 'r') as file:
        # Ler as linhas do arquivo
        for linha in file.readlines():
            data.append(linha.strip())
            
    return data

#Função para processar os parágrafos e retornar a lista de requisitos não funcionais
def extract_requirements(paragraphs):
    requirements = []
    for paragraph in paragraphs:
        test_data = [paragraph]
        test_vector = vectorizer.transform(test_data).toarray()
        predicted_label = classifier.predict(test_vector)
        requirements.append(predicted_label[0].strip())
    return requirements

corpus = []
labels = []

#definindo texto de treinamento
#values = loadFilesToArray("/home/mauricio/project/web/ndd-framework-app/storage/python/treinamento.txt")
#text = loadFiles("/home/mauricio/project/web/ndd-framework-app/storage/python/texto.txt")
values = loadFilesToArray(sys.argv[1])
text = loadFiles(sys.argv[2])


for value in values:
    data = value.split("|")
    corpus.append(data[0].strip())
    labels.append(data[1].strip())

#usando o CountVectorizer para transformar o corpus em vetores
vectorizer = CountVectorizer()
vectorizer.fit(corpus)

#Inicializando o classificador
classifier = DecisionTreeClassifier()

#Treinando o modelo
X = vectorizer.transform(corpus).toarray()

# Dividindo o conjunto de dados em conjuntos de treinamento e teste
X_train, X_test, y_train, y_test = train_test_split(X, labels, test_size=0.9, random_state=42)

classifier.fit(X, labels)

# Fazendo previsões no conjunto de teste
predicted_labels = classifier.predict(X_test)

# Avaliando a precisão do modelo
accuracy = accuracy_score(y_test, predicted_labels)

# Usando o método sent_tokenize do nltk para identificar os parágrafos
paragraphs = nltk.sent_tokenize(text)

#Chamando a função para extrair os requisitos não funcionais
extracted_requirements = set(extract_requirements(paragraphs))

#Mostrando a lista de requisitos não funcionais extraídos
line = ";".join(extracted_requirements)

value = "accuracy:" + str(accuracy) + "|" + line.strip().rstrip('\n').rstrip('\r')
print(value)
