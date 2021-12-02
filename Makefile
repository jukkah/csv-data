# Load .env first
ifneq (,$(wildcard ./.env))
	include .env
	export
endif

# And then .env.local overriding values previously loaded from .env
ifneq (,$(wildcard ./.env.local))
	include .env.local
	export
endif

.DEFAULT_GOAL := help

help: ## Print this help text (default target)
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' Makefile | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

zip: ## Create a zip file from src directory
	@echo "Clear previous files if exist"
	rm -rf ${NAME}
	rm -rf ${NAME}-v${VERSION}.zip

	@echo ""
	@echo "Make the zip file"
	cp -r src ${NAME}
	zip -qr ${NAME}-v${VERSION}.zip ${NAME}

	@echo ""
	@echo "Clear temp files"
	rm -r ${NAME}

sftp: ## Deploy the content of src directory via SFTP
	@echo "Deploying via SFTP"
	echo "mkdir ${NAME}\nrm ${NAME}/*\nput -r src/* ${NAME}\nexit\n" | sshpass -p ${SFTP_PASSWORD} sftp -P ${SFTP_PORT} ${SFTP_URL}
