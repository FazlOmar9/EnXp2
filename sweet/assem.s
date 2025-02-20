section .text

global player_will_love_this

player_will_love_this:
    pop rdi  
    ret
    pop r14 
    pop r15 
    ret
    mov qword [r14], r15; Pop the top of the stack into rdi
    ret    
    pop rdi
    pop rsi
    ret   ; Return to the next instruction
    
section .note.GNU-stack noalloc noexec nowrite progbits




