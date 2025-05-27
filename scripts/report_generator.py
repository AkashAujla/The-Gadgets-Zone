import sys
from fpdf import FPDF
import os

# Get command-line arguments
name = sys.argv[1] if len(sys.argv) > 1 else "Guest"
message = sys.argv[2] if len(sys.argv) > 2 else "No message"
filename = sys.argv[3] if len(sys.argv) > 3 else "report.pdf"

# Path to save PDF
output_path = f"C:/xampp/htdocs/ecommerce/reports/{filename}"

pdf = FPDF()
pdf.add_page()
pdf.set_font("Arial", size=12)
pdf.cell(200, 10, txt=f"Hello, {name}!", ln=True, align="C")
pdf.cell(200, 10, txt=f"Message: {message}", ln=True, align="C")
pdf.output(output_path)
