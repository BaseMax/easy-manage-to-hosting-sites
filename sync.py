import os
import glob
import subprocess


BASE_DIR = "dockers"
TEMPLATE_DIR = "template"


def execute_command(command, working_dir):
    """Executes a shell command in a specified working directory."""
    try:
        print(f"Running command: {' '.join(command)} in {working_dir}")
        subprocess.run(command, cwd=working_dir, check=True)
    except subprocess.CalledProcessError as e:
        print(f"Error executing command: {e}")


def process_subdirectories():
    """Iterates through subdirectories in BASE_DIR and runs docker-compose commands."""
    subdirs = glob.glob(os.path.join(BASE_DIR, "*"))

    for subdir in subdirs:
        env_file = os.path.join(subdir, ".env")

        if os.path.isfile(env_file):
            print(f"Found .env file in {subdir}")

            execute_command(
                ["docker-compose", "--env-file", env_file, "down", "--volumes"],
                TEMPLATE_DIR,
            )

            execute_command(
                ["docker-compose", "--env-file", env_file, "build", "--no-cache"],
                TEMPLATE_DIR,
            )

            execute_command(
                ["docker-compose", "--env-file", env_file, "up", "-d"], TEMPLATE_DIR
            )
        else:
            print(f"No .env file found in {subdir}, skipping...")


if __name__ == "__main__":
    if not os.path.isdir(BASE_DIR):
        print(f"Base directory '{BASE_DIR}' does not exist. Exiting...")
        exit(1)

    if not os.path.isdir(TEMPLATE_DIR):
        print(f"Template directory '{TEMPLATE_DIR}' does not exist. Exiting...")
        exit(1)

    print("Starting the Docker Compose refresh process...")
    process_subdirectories()
    print("Process completed.")
