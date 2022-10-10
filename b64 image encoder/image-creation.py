import base64
import io
from PIL import Image

input_file = input("Enter the relative path of the image: ")

with open(input_file, "rb") as image_file:
    encoded_string = base64.b64encode(image_file.read())

encoded_string = encoded_string.decode('utf-8')

output = open("output.txt","w")
output.write(str(encoded_string))
output.close()

print("Base 64 ended string for image:\n")

print(encoded_string)