@echo off
setlocal enabledelayedexpansion

for /D %%d in (*) do (
    if exist "%%d\Dockerfile" (
        echo Building Docker image for %%d...
        docker build -t ctf_%%d "%%d"
        if %ERRORLEVEL% NEQ 0 (
            echo Error occurred while building %%d. Skipping...
        )
    )
)

echo Done.
