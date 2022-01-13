module.exports = {
  cacheDirectory: 'node_modules/.cache/jest',
  collectCoverage: true,
  collectCoverageFrom: ['src/**/*.tsx', '!src/index.tsx'],
  setupFiles: ['<rootDir>/tests/config.ts'],
  setupFilesAfterEnv: ['<rootDir>/tests/setupTests.ts'],
  testEnvironment: 'jest-environment-jsdom',
  testPathIgnorePatterns: ['node_modules'],
  moduleDirectories: ['node_modules'],
  moduleNameMapper: {
    '^@/(.*)$': '<rootDir>/$1',
    '\\.(scss)': 'identity-obj-proxy',
  },
  transform: {
    '^.+\\.tsx?$': '@swc/jest',
  },
};