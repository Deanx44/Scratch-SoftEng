import sys
import random
import csv
from collections import defaultdict
from transformers import pipeline

def load_responses(csv_path):
    responses = defaultdict(list)
    try:
        with open(csv_path, newline='', encoding='utf-8') as csvfile:
            reader = csv.DictReader(csvfile)
            for row in reader:
                intent = row.get("intent", "").strip()
                response = row.get("response", "").strip()
                if intent and response:
                    responses[intent].append(response)
    except Exception as e:
        pass  # Optionally log to stderr: print(f"Error loading CSV: {e}", file=sys.stderr)
    return responses

def chatbot_reply(user_input, classifier, responses, candidate_labels, intent_map, threshold=0.2):
    user_input = user_input.lower().strip()
    try:
        result = classifier(user_input, candidate_labels)
        label = result["labels"][0]
        confidence = result["scores"][0]

        # For debugging (optional):
        # print(result, file=sys.stderr)

        if confidence < threshold:
            return "Sorry, I didn't understand that."

        intent = intent_map.get(label, "general")
        return random.choice(responses.get(intent, ["Sorry, I didn't understand that."]))
    except Exception:
        return "Sorry, I didn't understand that."

if __name__ == "__main__":
    try:
        # Descriptive labels for better zero-shot performance
        candidate_labels = [
            "The user is saying hello",
            "The user is expressing thanks",
            "The user is saying goodbye",
            "The user needs help",
            "The user wants to see the dashboard",
            "The user is asking about a quotation",
            "The user has a ticket-related issue",
            "The user wants to customize something",
            "The user is interested in educational packages",
            "The user wants information on a tour package",
            "The user is asking about ratings or reviews",
            "The user is asking about booking",
            "The user is having an account-related issue",
            "The user is asking about payment methods",
            "The user is experiencing technical issues",
            "The user is asking about refund or cancellation policies",
            "The user is interested in corporate or group travel",
            "The user is asking about confirmation emails or notifications",
            "The user wants to delete or update their account",
            "General question or other"
        ]

        # Map back to short internal intent keys
        intent_map = {
            "The user is saying hello": "greeting",
            "The user is expressing thanks": "thanks",
            "The user is saying goodbye": "bye",
            "The user needs help": "help",
            "The user wants to see the dashboard": "dashboard",
            "The user is asking about a quotation": "quotation",
            "The user has a ticket-related issue": "ticketed",
            "The user wants to customize something": "customize",
            "The user is interested in educational packages": "educational",
            "The user wants information on a tour package": "tour_package",
            "The user is asking about ratings or reviews": "ratings",
            "The user is asking about booking": "booking",
            "The user is having an account-related issue": "account",
            "The user is asking about payment methods": "payment",
            "The user is experiencing technical issues": "technical_issue",
            "The user is asking about refund or cancellation policies": "refund_policy",
            "The user is interested in corporate or group travel": "group_travel",
            "The user is asking about confirmation emails or notifications": "notification",
            "The user wants to delete or update their account": "account_update",
            "General question or other": "general"
        }


        # Load once
        classifier = pipeline("zero-shot-classification", model="facebook/bart-large-mnli")
        responses = load_responses(r"C:\xampp\htdocs\Isla de Cuyo Travel Ease\HTML\chat_reponses.csv")

        # CLI or fallback to interactive
        if len(sys.argv) > 1:
            user_input = sys.argv[1]
        else:
            user_input = input("You: ")

        reply = chatbot_reply(user_input, classifier, responses, candidate_labels, intent_map)
        print(reply)

    except Exception as e:
        print("Sorry, I couldn't process your request.")
        # For debugging: print(f"Error: {e}", file=sys.stderr)
