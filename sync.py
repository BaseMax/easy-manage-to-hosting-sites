import os
import glob
import subprocess

BASE_DIR = "dockers"

def refresh_and_run_docker_compose():
    subdirs = glob.glob(os.path.join(BASE_DIR, "*"))

    for subdir in subdirs:
        env_file = os.path.join(subdir, ".env")
        if os.path.isfile(env_file):
            template_dir = os.path.abspath("template")

            try:
                print(f"Stopping and removing old containers for {subdir}")
                subprocess.run(
                    ["docker-compose", "--env-file", env_file, "down", "--volumes"],
                    cwd=template_dir,
                    check=True,
                )
            except subprocess.CalledProcessError as e:
                print(f"Error during cleanup for {subdir}: {e}")

            try:
                print(f"Building Docker images for {subdir} without cache")
                subprocess.run(
                    ["docker-compose", "--env-file", env_file, "build", "--no-cache"],
                    cwd=template_dir,
                    check=True,
                )
            except subprocess.CalledProcessError as e:
                print(f"Error during build for {subdir}: {e}")

            try:
                print(f"Starting containers for {subdir}")
                subprocess.run(
                    ["docker-compose", "--env-file", env_file, "up", "-d"],
                    cwd=template_dir,
                    check=True,
                )
            except subprocess.CalledProcessError as e:
                print(f"Error running docker-compose up for {subdir}: {e}")
        else:
            print(f".env file does not exist in {subdir}, skipping...")

if __name__ == "__main__":
    refresh_and_run_docker_compose()
