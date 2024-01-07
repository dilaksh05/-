from PIL import Image
import os

def resize_images(input_folder, output_folder, width, height):
    if not os.path.exists(output_folder):
        os.makedirs(output_folder)

    for filename in os.listdir(input_folder):
        if filename.endswith(('.png', '.jpg', '.jpeg')):
            img_path = os.path.join(input_folder, filename)
            img = Image.open(img_path)
            img_resized = img.resize((width, height), Image.LANCZOS)
            output_path = os.path.join(output_folder, filename)
            img_resized.save(output_path)

input_folder = "D:\\project web\\net-01-05-2024-3\\carousel"
output_folder = "D:\\project web\\net-01-05-2024-3\\carousel\\image"

target_width = 300  # Change this to your desired width
target_height = 200  # Change this to your desired height

resize_images(input_folder, output_folder, target_width, target_height)
