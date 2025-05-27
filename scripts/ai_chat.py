import requests

def ask_ai(question):
    response = requests.post(
        'http://127.0.0.1:11435/api/generate',
        json={'model': 'tinyllama', 'prompt': question}
    )
    return response.json()

# Test the function
answer = ask_ai("What is the capital of France?")
print(answer)
