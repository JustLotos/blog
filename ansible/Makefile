
install: docker_init repo image_build swarm_reset

image_build:
	ansible-playbook -i inventory all.yml --tags "build"

swarm_reset:
	ansible-playbook -i inventory all.yml --tags "swarm_init, swarm_join, docker_deploy"

deploy:
	ansible-playbook -i inventory all.yml --tags "docker_deploy"

repo:
	ansible-playbook -i inventory all.yml --tags "repository"

docker_init:
	ansible-playbook -i inventory all.yml --tags "docker_init"