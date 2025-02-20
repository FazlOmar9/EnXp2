#!/bin/bash

# Function to handle errors
handle_error() {
    echo "An error occurred. Continuing..."
}

unique_folder="/home/connections/connection_$(date +%s%N)"
mkdir -p "$unique_folder"

cleanup() {
    echo "Cleaning up..."
    rm -rf "$unique_folder"
}

# Trap errors and call the handle_error function
trap 'handle_error' ERR

# Trap EXIT, INT, and TERM signals to call the cleanup function
trap 'cleanup' EXIT INT TERM

echo "Welcome to the sweet challenge!"
# Create a unique folder for each user

# Copy all files from /home/ctf to the unique folder
cp -r /home/ctf/* "$unique_folder"

# Change directory to the unique folder
cd "$unique_folder"

while true; do
    echo "Select a binary to run:"
    echo "0: Run chall 0"
    echo "1: Run chall 1"
    echo "2: Quit"
    read -p "Enter your choice: " choice

    case $choice in
        0)
            ./chall || handle_error
            ;;
        1)
            ./chall1 || handle_error
            ;;
        2)
            echo "Quitting..."
            break
            ;;
        *)
            echo "Invalid choice. Please enter 0, 1, or 2."
            ;;
    esac
done