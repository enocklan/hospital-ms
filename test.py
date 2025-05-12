import tkinter as tk
from tkinter import messagebox
def passmark() -> None:
    math = math_entry.get()
    english = english_entry.get()
    geography = geo_entry.get()
    physic = physic_entry.get()

    # Check if all fields are filled
    if math == "" or english == "" or geography == "" or physic == "":
        messagebox.showerror("Login", "All fields must be filled")
    else:
        math = int(math)
        english = int(english)
        geography = int(geography)
        physic = int(physic)

        total = math + english + geography + physic
        average = total / 4

        if average > 50:  # Assuming passing grade is 50
            print("You have passed")
            messagebox.showinfo("Passmark Checker", "You have passed")
        else:
            print("You have failed")
            messagebox.showerror("Passmark Checker", "You have failed")



root = tk.Tk()
root.title("practice")

root.geometry("500x500")


math_entry = tk.Label(root, text="Your Mathematics Marks:", font=('Agency FB', 16))
math_entry.pack(padx=20, pady="10")
math_entry = tk.Entry(root, width=40)
math_entry.pack()

english_entry = tk.Label(root, text="Your English Marks:", font=('Agency FB', 16))
english_entry.pack(padx=20, pady="10")
english_entry = tk.Entry(root, width=40)
english_entry.pack()

geo_entry = tk.Label(root, text="Your Geography Marks:", font=('Agency FB', 16))
geo_entry.pack(padx=20, pady="10")
geo_entry = tk.Entry(root, width=40)
geo_entry.pack()

physic_entry = tk.Label(root, text="Your Physics Marks:", font=('Agency FB', 16))
physic_entry.pack(padx=20, pady="10")
physic_entry = tk.Entry(root, width=40)
physic_entry.pack()

login_button = tk.Button(root, text="Login", bg="green", font=('Agency FB', 16), width=30, command= passmark)
login_button.pack(padx=20, pady="10")
root.mainloop()
