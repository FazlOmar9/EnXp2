#!/bin/bash

while true; do
    echo "Select a binary to run:"
    echo "0: Run chall 0"
    echo "1: Run chall 1"
    echo "2: Quit"
    read -p "Enter your choice: " choice

    case $choice in
        0)
            /home/ctf/chall
            ;;
        1)
            /home/ctf/chall1
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