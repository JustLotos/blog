FROM node:alpine
RUN apk add --update  sudo \
			          python3 \
		     	      yarn \
			          make \
                      g++
RUN yarn add --dev @symfony/webpack-encore
RUN echo "node:node" | chpasswd
RUN echo '%wheel ALL=(ALL) ALL' > /etc/sudoers.d/wheel
RUN adduser node wheel
WORKDIR /app
USER node
