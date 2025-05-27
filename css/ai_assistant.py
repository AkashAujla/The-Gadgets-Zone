from flask import Flask, request, jsonify
import openai

# Initialize Flask app
app = Flask(__name__)

# Set your OpenAI API key here
openai.api_key = "YOUR_OPENAI_API_KEY"  # Replace with your API key

# Define the route for handling AI queries
@app.route("/ask_ai", methods=["POST"])
def ask_ai():
    # Get the prompt from the request body
    data = request.get_json()
    prompt = data.get("prompt")

    if prompt:
        # Make a request to OpenAI's API
        response = openai.Completion.create(
            model="text-davinci-003",  # You can use gpt-4 or other models
            prompt=prompt,
            max_tokens=150
        )
        # Return the AI response as JSON
        return jsonify({"response": response.choices[0].text.strip()})
    else:
        return jsonify({"error": "No prompt provided"}), 400

# Run the Flask app
if __name__ == "__main__":
    app.run(debug=True, host="0.0.0.0", port=5000)
