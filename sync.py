import os
import traceback
import subprocess

def run_command(command, cwd=None):
    try:
        print(f"Running command: {' '.join(command)} in {cwd or os.getcwd()}")
        result = subprocess.run(command, cwd=cwd, check=True, text=True, capture_output=True)
        print(result.stdout)
    except subprocess.CalledProcessError as e:
        print(f"Error executing command: {e}")
        print(e.stderr)
    except Exception as ex:
        print(f"Unexpected error: {ex}")
        traceback.print_exc()

def process_env_file(env_file_path, template_dir):
    env_file_relative = os.path.join("..", env_file_path.replace("\\", "/"))
    docker_compose_relative = os.path.join(template_dir, "docker-compose.yml")

    commands = [
        ["docker-compose", "-f", docker_compose_relative, "--env-file", env_file_relative, "down", "--volumes"],
        ["docker-compose", "-f", docker_compose_relative, "--env-file", env_file_relative, "build"],
        # ["docker-compose", "-f", docker_compose_relative, "--env-file", env_file_relative, "build", "--no-cache"],
        ["docker-compose", "-f", docker_compose_relative, "--env-file", env_file_relative, "up", "-d"]
    ]
    for command in commands:
        print(f"Running command:\n{" ".join(command)}")
        run_command(command, cwd=template_dir)

def main():
    print("Starting the Docker Compose refresh process...")
    template_dir = os.path.join(os.getcwd(), "template")
    dockers_path = os.path.join(os.getcwd(), "dockers")

    for subdir in os.listdir(dockers_path):
        env_file_path = os.path.join(dockers_path, subdir, ".env")
        
        if os.path.isfile(env_file_path):
            print(f"Found .env file in {env_file_path}")
            process_env_file(env_file_path, template_dir)
        else:
            print(f"No .env file found in {env_file_path}")

    print("Process completed.")

if __name__ == "__main__":
    main()
