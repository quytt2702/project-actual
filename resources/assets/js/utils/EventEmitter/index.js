class EventEmitter {

  constructor(subscribers = []) {
    this.subscribers = subscribers;
  }

  subscribe(callback) {
    this.subscribers.push(callback);
  }

  fire() {
    this.subscribers.forEach(callback => {
      if (typeof callback === 'function') {
        callback(...arguments);
      }
    });
  }
}

export default EventEmitter;
